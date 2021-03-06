<?php

namespace Sammyjo20\SaloonCachePlugin\Tests\Fixtures\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\SaloonCachePlugin\Drivers\SimpleCacheDriver;
use Sammyjo20\SaloonCachePlugin\Interfaces\DriverInterface;
use Sammyjo20\SaloonCachePlugin\Traits\AlwaysCacheResponses;
use Sammyjo20\SaloonCachePlugin\Tests\Fixtures\Stores\ArrayCache;
use Sammyjo20\SaloonCachePlugin\Tests\Fixtures\Connectors\TestConnector;

class SimpleCachedUserRequest extends SaloonRequest
{
    use AlwaysCacheResponses;

    protected ?string $connector = TestConnector::class;

    protected ?string $method = Saloon::GET;

    public function defineEndpoint(): string
    {
        return '/user';
    }

    public function __construct(protected ArrayCache $cache)
    {
        //
    }

    public function cacheDriver(): DriverInterface
    {
        return new SimpleCacheDriver($this->cache);
    }

    public function cacheTTLInSeconds(): int
    {
        return 60;
    }
}
