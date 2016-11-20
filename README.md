Contao Multidomain Rebuild Index
=====================

Rebuilding the search index via the backend of Contao actually creates an AJAX request for every page in the sitemap of every website root of the Contao installation. Thus, in order to be able to rebuild the search index in multidomain installations you need to set custom response headers for any page request that Contao handles, due to [CORS](https://en.wikipedia.org/wiki/Cross-origin_resource_sharing). The headers are:
```
Access-Control-Allow-Headers: X-Requested-With
Access-Control-Allow-Origin: …
```
The first header is necessary, because Contao uses the MooTools `Request` class, which always adds the `X-Requested-With` request header (see [mootools.net/core/docs/1.5.2/Request/Request](http://mootools.net/core/docs/1.5.2/Request/Request)). The second header allows AJAX Requests from other domains.

Adding these headers could be done via the `.htaccess`, __however__ this does not work in case the PHP process is executed via FastCGI. In that case you would need to set these headers directly in the vhost configuration of Apache.

This extension helps with cases where that is not possible. By installing this extension the headers are automatically set for any front end page output. The `Access-Control-Allow-Origin` header is automatically set to the domain with which you accessed the Contao back end. No configuration is needed for this extension.
