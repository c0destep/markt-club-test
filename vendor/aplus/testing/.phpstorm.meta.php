<?php
/*
 * This file is part of Aplus Framework Testing Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPSTORM_META;

registerArgumentsSet(
    'methods',
    \Framework\HTTP\Method::CONNECT,
    \Framework\HTTP\Method::DELETE,
    \Framework\HTTP\Method::GET,
    \Framework\HTTP\Method::HEAD,
    \Framework\HTTP\Method::OPTIONS,
    \Framework\HTTP\Method::PATCH,
    \Framework\HTTP\Method::POST,
    \Framework\HTTP\Method::PUT,
    \Framework\HTTP\Method::TRACE,
    'CONNECT',
    'DELETE',
    'GET',
    'HEAD',
    'OPTIONS',
    'PATCH',
    'POST',
    'PUT',
    'TRACE',
);
registerArgumentsSet(
    'response_status_codes',
    \Framework\HTTP\Status::CONTINUE,
    \Framework\HTTP\Status::SWITCHING_PROTOCOLS,
    \Framework\HTTP\Status::PROCESSING,
    \Framework\HTTP\Status::EARLY_HINTS,
    \Framework\HTTP\Status::OK,
    \Framework\HTTP\Status::CREATED,
    \Framework\HTTP\Status::ACCEPTED,
    \Framework\HTTP\Status::NON_AUTHORITATIVE_INFORMATION,
    \Framework\HTTP\Status::NO_CONTENT,
    \Framework\HTTP\Status::RESET_CONTENT,
    \Framework\HTTP\Status::PARTIAL_CONTENT,
    \Framework\HTTP\Status::MULTI_STATUS,
    \Framework\HTTP\Status::ALREADY_REPORTED,
    \Framework\HTTP\Status::IM_USED,
    \Framework\HTTP\Status::MULTIPLE_CHOICES,
    \Framework\HTTP\Status::MOVED_PERMANENTLY,
    \Framework\HTTP\Status::FOUND,
    \Framework\HTTP\Status::SEE_OTHER,
    \Framework\HTTP\Status::NOT_MODIFIED,
    \Framework\HTTP\Status::USE_PROXY,
    \Framework\HTTP\Status::SWITCH_PROXY,
    \Framework\HTTP\Status::TEMPORARY_REDIRECT,
    \Framework\HTTP\Status::PERMANENT_REDIRECT,
    \Framework\HTTP\Status::BAD_REQUEST,
    \Framework\HTTP\Status::UNAUTHORIZED,
    \Framework\HTTP\Status::PAYMENT_REQUIRED,
    \Framework\HTTP\Status::FORBIDDEN,
    \Framework\HTTP\Status::NOT_FOUND,
    \Framework\HTTP\Status::METHOD_NOT_ALLOWED,
    \Framework\HTTP\Status::NOT_ACCEPTABLE,
    \Framework\HTTP\Status::PROXY_AUTHENTICATION_REQUIRED,
    \Framework\HTTP\Status::REQUEST_TIMEOUT,
    \Framework\HTTP\Status::CONFLICT,
    \Framework\HTTP\Status::GONE,
    \Framework\HTTP\Status::LENGTH_REQUIRED,
    \Framework\HTTP\Status::PRECONDITION_FAILED,
    \Framework\HTTP\Status::PAYLOAD_TOO_LARGE,
    \Framework\HTTP\Status::URI_TOO_LARGE,
    \Framework\HTTP\Status::UNSUPPORTED_MEDIA_TYPE,
    \Framework\HTTP\Status::RANGE_NOT_SATISFIABLE,
    \Framework\HTTP\Status::EXPECTATION_FAILED,
    \Framework\HTTP\Status::IM_A_TEAPOT,
    \Framework\HTTP\Status::MISDIRECTED_REQUEST,
    \Framework\HTTP\Status::UNPROCESSABLE_ENTITY,
    \Framework\HTTP\Status::LOCKED,
    \Framework\HTTP\Status::FAILED_DEPENDENCY,
    \Framework\HTTP\Status::TOO_EARLY,
    \Framework\HTTP\Status::UPGRADE_REQUIRED,
    \Framework\HTTP\Status::PRECONDITION_REQUIRED,
    \Framework\HTTP\Status::TOO_MANY_REQUESTS,
    \Framework\HTTP\Status::REQUEST_HEADER_FIELDS_TOO_LARGE,
    \Framework\HTTP\Status::UNAVAILABLE_FOR_LEGAL_REASONS,
    \Framework\HTTP\Status::CLIENT_CLOSED_REQUEST,
    \Framework\HTTP\Status::INTERNAL_SERVER_ERROR,
    \Framework\HTTP\Status::NOT_IMPLEMENTED,
    \Framework\HTTP\Status::BAD_GATEWAY,
    \Framework\HTTP\Status::SERVICE_UNAVAILABLE,
    \Framework\HTTP\Status::GATEWAY_TIMEOUT,
    \Framework\HTTP\Status::CODE_VERSION_NOT_SUPPORTED,
    \Framework\HTTP\Status::VARIANT_ALSO_NEGOTIATES,
    \Framework\HTTP\Status::INSUFFICIENT_STORAGE,
    \Framework\HTTP\Status::LOOP_DETECTED,
    \Framework\HTTP\Status::NOT_EXTENDED,
    \Framework\HTTP\Status::NETWORK_AUTHENTICATION_REQUIRED,
    \Framework\HTTP\Status::NETWORK_CONNECT_TIMEOUT_ERROR,
);
registerArgumentsSet(
    'response_headers',
    \Framework\HTTP\Header::CACHE_CONTROL,
    \Framework\HTTP\Header::CONNECTION,
    \Framework\HTTP\Header::CONTENT_DISPOSITION,
    \Framework\HTTP\Header::CONTENT_ENCODING,
    \Framework\HTTP\Header::CONTENT_LANGUAGE,
    \Framework\HTTP\Header::CONTENT_LENGTH,
    \Framework\HTTP\Header::CONTENT_LOCATION,
    \Framework\HTTP\Header::CONTENT_RANGE,
    \Framework\HTTP\Header::CONTENT_TYPE,
    \Framework\HTTP\Header::DATE,
    \Framework\HTTP\Header::KEEP_ALIVE,
    \Framework\HTTP\Header::TRAILER,
    \Framework\HTTP\Header::TRANSFER_ENCODING,
    \Framework\HTTP\Header::VIA,
    \Framework\HTTP\Header::WARNING,
    \Framework\HTTP\Header::X_REQUEST_ID,
    \Framework\HTTP\ResponseHeader::ACCEPT_RANGES,
    \Framework\HTTP\ResponseHeader::ACCESS_CONTROL_ALLOW_CREDENTIALS,
    \Framework\HTTP\ResponseHeader::ACCESS_CONTROL_ALLOW_HEADERS,
    \Framework\HTTP\ResponseHeader::ACCESS_CONTROL_ALLOW_METHODS,
    \Framework\HTTP\ResponseHeader::ACCESS_CONTROL_ALLOW_ORIGIN,
    \Framework\HTTP\ResponseHeader::ACCESS_CONTROL_EXPOSE_HEADERS,
    \Framework\HTTP\ResponseHeader::ACCESS_CONTROL_MAX_AGE,
    \Framework\HTTP\ResponseHeader::AGE,
    \Framework\HTTP\ResponseHeader::ALLOW,
    \Framework\HTTP\ResponseHeader::CLEAR_SITE_DATA,
    \Framework\HTTP\ResponseHeader::CONTENT_SECURITY_POLICY,
    \Framework\HTTP\ResponseHeader::CONTENT_SECURITY_POLICY_REPORT_ONLY,
    \Framework\HTTP\ResponseHeader::ETAG,
    \Framework\HTTP\ResponseHeader::EXPECT_CT,
    \Framework\HTTP\ResponseHeader::EXPIRES,
    \Framework\HTTP\ResponseHeader::FEATURE_POLICY,
    \Framework\HTTP\ResponseHeader::LAST_MODIFIED,
    \Framework\HTTP\ResponseHeader::LOCATION,
    \Framework\HTTP\ResponseHeader::PROXY_AUTHENTICATE,
    \Framework\HTTP\ResponseHeader::PUBLIC_KEY_PINS,
    \Framework\HTTP\ResponseHeader::PUBLIC_KEY_PINS_REPORT_ONLY,
    \Framework\HTTP\ResponseHeader::REFERRER_POLICY,
    \Framework\HTTP\ResponseHeader::RETRY_AFTER,
    \Framework\HTTP\ResponseHeader::SERVER,
    \Framework\HTTP\ResponseHeader::SET_COOKIE,
    \Framework\HTTP\ResponseHeader::SOURCEMAP,
    \Framework\HTTP\ResponseHeader::STRICT_TRANSPORT_SECURITY,
    \Framework\HTTP\ResponseHeader::TIMING_ALLOW_ORIGIN,
    \Framework\HTTP\ResponseHeader::TK,
    \Framework\HTTP\ResponseHeader::VARY,
    \Framework\HTTP\ResponseHeader::WWW_AUTHENTICATE,
    \Framework\HTTP\ResponseHeader::X_CONTENT_TYPE_OPTIONS,
    \Framework\HTTP\ResponseHeader::X_DNS_PREFETCH_CONTROL,
    \Framework\HTTP\ResponseHeader::X_FRAME_OPTIONS,
    \Framework\HTTP\ResponseHeader::X_POWERED_BY,
    \Framework\HTTP\ResponseHeader::X_XSS_PROTECTION,
    'Accept-Ranges',
    'Access-Control-Allow-Credentials',
    'Access-Control-Allow-Headers',
    'Access-Control-Allow-Methods',
    'Access-Control-Allow-Origin',
    'Access-Control-Expose-Headers',
    'Access-Control-Max-Age',
    'Age',
    'Allow',
    'Cache-Control',
    'Clear-Site-Data',
    'Connection',
    'Content-Disposition',
    'Content-Encoding',
    'Content-Language',
    'Content-Length',
    'Content-Location',
    'Content-Range',
    'Content-Security-Policy',
    'Content-Security-Policy-Report-Only',
    'Content-Type',
    'Date',
    'ETag',
    'Expect-CT',
    'Expires',
    'Feature-Policy',
    'Keep-Alive',
    'Last-Modified',
    'Location',
    'Proxy-Authenticate',
    'Public-Key-Pins',
    'Public-Key-Pins-Report-Only',
    'Referrer-Policy',
    'Retry-After',
    'Server',
    'Set-Cookie',
    'SourceMap',
    'Strict-Transport-Security',
    'Timing-Allow-Origin',
    'Tk',
    'Trailer',
    'Transfer-Encoding',
    'Vary',
    'Via',
    'WWW-Authenticate',
    'Warning',
    'X-Content-Type-Options',
    'X-DNS-Prefetch-Control',
    'X-Frame-Options',
    'X-Powered-By',
    'X-Request-ID',
    'X-XSS-Protection',
);
expectedArguments(
    \Framework\Testing\AppTesting::runHttp(),
    1,
    argumentsSet('methods')
);
expectedArguments(
    \Framework\Testing\TestCase::assertResponseStatusCode(),
    0,
    argumentsSet('response_status_codes')
);
expectedArguments(
    \Framework\Testing\TestCase::assertResponseContainsHeader(),
    0,
    argumentsSet('response_headers')
);
expectedArguments(
    \Framework\Testing\TestCase::assertResponseHeader(),
    0,
    argumentsSet('response_headers')
);
