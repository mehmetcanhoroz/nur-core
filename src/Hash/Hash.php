<?php

namespace Nur\Hash;

class Hash implements HashInterface
{
    /**
     * Get information about the given hashed value.
     *
     * @param  string $hashedValue
     *
     * @return array
     */
    public function info($hashedValue)
    {
        return $this->driver()->info($hashedValue);
    }

    /**
     * Hash the given value.
     *
     * @param  string $value
     * @param  array  $options
     *
     * @return string
     */
    public function make($value, array $options = [])
    {
        return $this->driver()->make($value, $options);
    }

    /**
     * Check the given plain value against a hash.
     *
     * @param  string $value
     * @param  string $hashedValue
     * @param  array  $options
     *
     * @return bool
     */
    public function check($value, $hashedValue, array $options = [])
    {
        return $this->driver()->check($value, $hashedValue, $options);
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param  string $hashedValue
     * @param  array  $options
     *
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        return $this->driver()->needsRehash($hashedValue, $options);
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return config('hashing.driver') ?? 'bcrypt';
    }

    /**
     * Get the default driver.
     *
     * @return mixed
     */
    protected function driver()
    {
        if ($this->getDefaultDriver() === 'argon') {
            return $this->createArgonDriver();
        }

        return $this->createBcryptDriver();
    }

    /**
     * Create an instance of the Bcrypt hash Driver.
     *
     * @return \Nur\Hash\BcryptHash
     */
    protected function createBcryptDriver()
    {
        return new BcryptHash(config('hashing.bcrypt') ?? []);
    }

    /**
     * Create an instance of the Argon2 hash Driver.
     *
     * @return \Nur\Hash\ArgonHash
     */
    protected function createArgonDriver()
    {
        return new ArgonHash(config('hashing.argon') ?? []);
    }
}