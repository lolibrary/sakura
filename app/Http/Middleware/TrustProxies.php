<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;

class TrustProxies
{
    /**
     * The config repository instance.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * The trusted proxies for the application.
     *
     * @var array|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var string|int|null
     */
    protected $headers = Request::HEADER_X_FORWARDED_FOR
        | Request::HEADER_X_FORWARDED_HOST
        | Request::HEADER_X_FORWARDED_PORT
        | Request::HEADER_X_FORWARDED_PROTO
        | Request::HEADER_X_FORWARDED_AWS_ELB;

    /**
     * Create a new trusted proxies middleware instance.
     *
     * @param  \Illuminate\Contracts\Config\Repository  $config
     * @return void
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Reset trusted proxies between requests before applying current config.
        $request::setTrustedProxies([], $this->getTrustedHeaderNames());
        $this->setTrustedProxyIpAddresses($request);

        return $next($request);
    }

    /**
     * Set the trusted proxy IP addresses on the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function setTrustedProxyIpAddresses(Request $request)
    {
        $trustedIps = $this->proxies ?: $this->config->get('trustedproxy.proxies');

        if ($trustedIps === '*' || $trustedIps === '**') {
            $this->setTrustedProxyIpAddressesToTheCallingIp($request);

            return;
        }

        if (is_string($trustedIps)) {
            $trustedIps = array_map('trim', explode(',', $trustedIps));
        }

        if (is_array($trustedIps)) {
            $this->setTrustedProxyIpAddressesToSpecificIps($request, $trustedIps);
        }
    }

    /**
     * Trust only the specific IP addresses supplied.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $trustedIps
     * @return void
     */
    protected function setTrustedProxyIpAddressesToSpecificIps(Request $request, array $trustedIps)
    {
        $request->setTrustedProxies($trustedIps, $this->getTrustedHeaderNames());
    }

    /**
     * Trust the proxy that made the current request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function setTrustedProxyIpAddressesToTheCallingIp(Request $request)
    {
        $request->setTrustedProxies([$request->server->get('REMOTE_ADDR')], $this->getTrustedHeaderNames());
    }

    /**
     * Get the trusted proxy headers bitmask.
     *
     * @return int
     */
    protected function getTrustedHeaderNames()
    {
        $headers = $this->headers ?: $this->config->get('trustedproxy.headers');

        switch ($headers) {
            case 'HEADER_X_FORWARDED_AWS_ELB':
            case Request::HEADER_X_FORWARDED_AWS_ELB:
                return Request::HEADER_X_FORWARDED_AWS_ELB;
            case 'HEADER_FORWARDED':
            case Request::HEADER_FORWARDED:
                return Request::HEADER_FORWARDED;
            case 'HEADER_X_FORWARDED_FOR':
            case Request::HEADER_X_FORWARDED_FOR:
                return Request::HEADER_X_FORWARDED_FOR;
            case 'HEADER_X_FORWARDED_HOST':
            case Request::HEADER_X_FORWARDED_HOST:
                return Request::HEADER_X_FORWARDED_HOST;
            case 'HEADER_X_FORWARDED_PORT':
            case Request::HEADER_X_FORWARDED_PORT:
                return Request::HEADER_X_FORWARDED_PORT;
            case 'HEADER_X_FORWARDED_PROTO':
            case Request::HEADER_X_FORWARDED_PROTO:
                return Request::HEADER_X_FORWARDED_PROTO;
            default:
                return Request::HEADER_X_FORWARDED_FOR
                    | Request::HEADER_X_FORWARDED_HOST
                    | Request::HEADER_X_FORWARDED_PORT
                    | Request::HEADER_X_FORWARDED_PROTO
                    | Request::HEADER_X_FORWARDED_AWS_ELB;
        }
    }
}
