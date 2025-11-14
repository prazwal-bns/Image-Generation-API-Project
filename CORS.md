# CORS Configuration Guide

## What is CORS?

**CORS (Cross-Origin Resource Sharing)** is a security mechanism implemented by web browsers that allows servers to specify which origins (domains, protocols, or ports) are permitted to access their resources. This prevents unauthorized websites from making requests to your API on behalf of users.

### Why CORS Matters

When your frontend application (running on one origin, e.g., `http://localhost:5173`) tries to make a request to your backend API (running on a different origin, e.g., `http://127.0.0.1:8000`), the browser enforces the **Same-Origin Policy**. Without proper CORS configuration, these cross-origin requests will be blocked by the browser.

---

## The Problem

In our case, the Laravel backend server is configured to only allow requests from `http://localhost:3000`, but the Vue.js frontend is running on `http://localhost:5173` (Vite's default port). This mismatch causes CORS errors.

### Error Message

When CORS is misconfigured, you'll see this error in the browser console:

```
Access to fetch at 'http://127.0.0.1:8000/api/v1/prompt-generations' from origin 'http://localhost:5173' 
has been blocked by CORS policy: The 'Access-Control-Allow-Origin' header has a value 'http://localhost:3000' 
that is not equal to the supplied origin. Have the server send the header with a valid value.

Uncaught (in promise) TypeError: Failed to fetch
    at App.vue:8:3
    at main.js:5:16
```

---

## Solutions

### Solution 1: Change Frontend Port (Quick Fix)

If you want to quickly test without changing server configuration, you can change the Vue.js dev server port to match what the backend expects:

**In `package.json`:**
```json
{
  "scripts": {
    "dev": "vite --port=3000"
  }
}
```

Then restart your dev server:
```bash
npm run dev
```

**Note:** This is a temporary workaround. For production, you should configure the backend properly.

---

### Solution 2: Configure Laravel CORS (Recommended)

The proper solution is to configure your Laravel application's CORS settings to allow your frontend origin.

#### Step 1: Configure `config/cors.php`

Open your Laravel application's `config/cors.php` file and configure it as follows:

```php
<?php

return [
    // API paths that should be accessible via CORS
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // HTTP methods allowed for CORS requests
    'allowed_methods' => ['*'], // ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS']

    // Allowed origins (frontend URLs)
    'allowed_origins' => [
        env('FRONTEND_URL', 'http://localhost:3000')
    ],
    
    // Alternative: Allow multiple specific origins
    // 'allowed_origins' => [
    //     'http://localhost:3000',
    //     'http://localhost:5173',
    //     'http://localhost:8080',
    // ],
    
    // ⚠️ WARNING: Only use in development!
    // 'allowed_origins' => ['*'], // Allow all origins (NOT recommended for production)

    // Pattern-based origin matching (useful for dynamic subdomains)
    'allowed_origins_patterns' => [
        // Example: 'https://*.example.com'
    ],

    // Allowed headers in CORS requests
    'allowed_headers' => ['*'], // ['Content-Type', 'Authorization', 'X-Requested-With']

    // Headers that can be accessed by the frontend
    'exposed_headers' => [],

    // How long (in seconds) the browser should cache preflight requests
    'max_age' => 0, // 0 = no cache, 3600 = 1 hour

    // Whether to allow credentials (cookies, authorization headers)
    'supports_credentials' => true,
];
```

#### Step 2: Configure Environment Variables

**Option A: Single Frontend URL**

In your `.env` file:
```env
FRONTEND_URL=http://localhost:5173
```

**Option B: Multiple Frontend URLs**

If you need to support multiple frontend URLs, you'll need to modify the CORS configuration to parse a comma-separated list:

In `config/cors.php`:
```php
'allowed_origins' => array_filter(
    array_map('trim', explode(',', env('FRONTEND_URL', 'http://localhost:3000')))
),
```

In `.env`:
```env
FRONTEND_URL=http://localhost:3000,http://localhost:5173,http://localhost:8080
```

#### Step 3: Clear Configuration Cache

After making changes, clear Laravel's configuration cache:

```bash
php artisan config:clear
php artisan cache:clear
```

---

## Configuration Options Explained

| Option | Description | Example |
|--------|-------------|---------|
| `paths` | API routes that should be accessible via CORS | `['api/*', 'sanctum/csrf-cookie']` |
| `allowed_methods` | HTTP methods allowed in CORS requests | `['GET', 'POST', 'PUT', 'DELETE']` or `['*']` |
| `allowed_origins` | Frontend URLs that can make requests | `['http://localhost:5173']` |
| `allowed_origins_patterns` | Regex patterns for dynamic origins | `['https://*.example.com']` |
| `allowed_headers` | Headers allowed in requests | `['Content-Type', 'Authorization']` or `['*']` |
| `exposed_headers` | Headers the frontend can read | `['X-Custom-Header']` |
| `max_age` | Preflight cache duration (seconds) | `3600` (1 hour) |
| `supports_credentials` | Allow cookies/auth headers | `true` or `false` |

---

## Best Practices

### Development
- ✅ Use specific origins: `['http://localhost:5173']`
- ✅ Keep `supports_credentials` set to `true` if you need authentication
- ✅ Use environment variables for flexibility

### Production
- ❌ **Never** use `'allowed_origins' => ['*']` in production
- ✅ Always specify exact production frontend URLs
- ✅ Use HTTPS URLs only
- ✅ Set appropriate `max_age` to reduce preflight requests
- ✅ Regularly review and update allowed origins

---

## Troubleshooting

### Issue: CORS error persists after configuration

1. **Clear Laravel caches:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   ```

2. **Verify the origin matches exactly:**
   - Check for trailing slashes: `http://localhost:5173` vs `http://localhost:5173/`
   - Check protocol: `http://` vs `https://`
   - Check port numbers

3. **Check browser console:**
   - Look for the exact origin in the error message
   - Verify the `Access-Control-Allow-Origin` header value

4. **Test with curl:**
   ```bash
   curl -H "Origin: http://localhost:5173" \
        -H "Access-Control-Request-Method: GET" \
        -H "Access-Control-Request-Headers: Content-Type" \
        -X OPTIONS \
        http://127.0.0.1:8000/api/v1/prompt-generations \
        -v
   ```

## Additional Resources

- [MDN Web Docs: CORS](https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS)
- [Laravel CORS Documentation](https://laravel.com/docs/cors)
- [Fruitcake Laravel CORS Package](https://github.com/fruitcake/laravel-cors)
