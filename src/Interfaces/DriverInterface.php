<?php

namespace Sammyjo20\SaloonCachePlugin\Interfaces;

use Sammyjo20\SaloonCachePlugin\Data\CachedResponse;

interface DriverInterface
{
    /**
     * Store the cached response on the driver.
     *
     * @param string $cacheKey
     * @param CachedResponse $response
     * @return void
     */
    public function set(string $cacheKey, CachedResponse $response): void;

    /**
     * Get the cached response from the driver.
     *
     * @param string $cacheKey
     * @return CachedResponse|null
     */
    public function get(string $cacheKey): ?CachedResponse;

    /**
     * Delete the cached response.
     *
     * @param string $cacheKey
     * @return void
     */
    public function delete(string $cacheKey): void;
}
