# OpenID Connect (OIDC)

See: [What is OpenID Connect?](https://openid.net/connect/).

This is one of the [access control methods](09_AccessControl.md) supported by FreshRSS.

OIDC support is provided by the Apache module [mod_auth_openidc](https://github.com/OpenIDC/mod_auth_openidc).
This documentation is about OIDC as available in our official Docker image, or when using an Apache Web server.
Additional documentation can be found in that project.

The callback URL is `https://<your-domain>/i/oidc/`.

## Initial Setup Process

When setting up a new FreshRSS instance with OIDC, follow these steps carefully to ensure proper administrator access:

1. Configure your OIDC environment variables (see configuration section below)
2. Start your FreshRSS instance
3. Access the Web interface – it will immediately attempt to authenticate you via your OIDC provider
4. After successful authentication, you’ll be directed to the setup wizard
5. In the authentication setup step (currently *step 4*):
   * Enter the exact username that matches your OIDC identity (e.g., `admin@idm.example.com`) as the default user
   * The password field can contain any random value as it won’t be used with OIDC
   * Select *HTTP Authentication Method* as the authentication method
   * If configured correctly, you should see your current username displayed as: `HTTP (for advanced users with HTTPS) (REMOTE_USER='admin@idm.example.com')`. If it doesn’t, recheck your OIDC setup and the variables to avoid locking yourself out from administrator access.
6. Complete the remaining setup steps

> ⚠️ Important: Using a random username instead of your actual OIDC identity as the default user may result in no administrator access to your instance.

## Using Docker

OIDC support in Docker is activated by the presence of a non-empty non-zero `OIDC_ENABLED` environment variable.

> ℹ️ Only available in our default Debian image (not Alpine) for `x86_64` ([help welcome](https://github.com/FreshRSS/FreshRSS/issues/5722)).

## Configuration Environment Variables

* `OIDC_ENABLED`: Activates OIDC support.
* `OIDC_PROVIDER_METADATA_URL`: The config URL. Usually looks like: `<issuer>/.well-known/openid-configuration`
* `OIDC_CLIENT_ID`: The OIDC client id from your issuer.
* `OIDC_CLIENT_SECRET`: The OIDC client secret issuer.
* `OIDC_CLIENT_CRYPTO_KEY`: An opaque key used for internal encryption.
* `OIDC_REMOTE_USER_CLAIM`: The claim to use as the username within FreshRSS. Defaults to `preferred_username`. Depending on what you choose here, and your identity provider, you’ll need to adjust the scopes you request so that this claim will be accessible. Refer to your identity provider’s documentation.
* `OIDC_SCOPES`: The OIDC scopes to request separated by an empty space. Defaults to `openid`. As mentioned previously, make sure the scopes you pick contain whatever `OIDC_REMOTE_USER_CLAIM` you chose. For example, Authelia would require setting this value to `openid profile` to make `preferred_username` accessible.
* `OIDC_X_FORWARDED_HEADERS`: Optional, but required when running FreshRSS behind a reverse proxy so that the OIDC module can determine what hostname, port and protocol were used to access FreshRSS, in order to generate a return URL for the OIDC authorization flow. Must be one or more of `Forwarded`, `X-Forwarded-Host`, `X-Forwarded-Port` or `X-Forwarded-Proto` (separate multiple values with a space). See [mod_auth_openidc’s documentation for details](https://github.com/OpenIDC/mod_auth_openidc/blob/72c9f479c2d228477ff0a9518964f61879c83fb6/auth_openidc.conf#L1041-L1048).
* `OIDC_SESSION_INACTIVITY_TIMEOUT`: Optional. Interval in seconds after which the session will be invalidated when no interaction has occurred. When not defined, the default is 300 seconds.
* `OIDC_SESSION_MAX_DURATION`: Optional. Maximum duration of the application session. When not defined the default is 8 hours (3600 * 8 seconds). When set to 0, the session duration will be set equal to the expiry time of the ID token.
* `OIDC_SESSION_TYPE`: Optional. OpenID Connect session storage type. See [mod_auth_openidc’s documentation for details](https://github.com/OpenIDC/mod_auth_openidc/blob/72c9f479c2d228477ff0a9518964f61879c83fb6/auth_openidc.conf#L587-L596).

You may add additional custom configuration in a new `./FreshRSS/p/i/.htaccess` file.

## Using own Apache installation

See our reference [Apache configuration](https://github.com/FreshRSS/FreshRSS/blob/edge/Docker/FreshRSS.Apache.conf) for more information.

## Identity Provider

See specific instructions for:

* Authentik: [here](16_OpenID-Connect-Authentik.md) or [here](https://goauthentik.io/integrations/services/freshrss/)
* Authelia: [here](https://www.authelia.com/integration/openid-connect/freshrss/)
* Pocket ID: [here](18_Pocket-ID.md)
