<?php
# Copyright (c) 2013-2016, OVH SAS.
# All rights reserved.
#
# Redistribution and use in source and binary forms, with or without
# modification, are permitted provided that the following conditions are met:
#
#   * Redistributions of source code must retain the above copyright
#     notice, this list of conditions and the following disclaimer.
#   * Redistributions in binary form must reproduce the above copyright
#     notice, this list of conditions and the following disclaimer in the
#     documentation and/or other materials provided with the distribution.
#   * Neither the name of OVH SAS nor the
#     names of its contributors may be used to endorse or promote products
#     derived from this software without specific prior written permission.
#
# THIS SOFTWARE IS PROVIDED BY OVH SAS AND CONTRIBUTORS ``AS IS'' AND ANY
# EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
# WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
# DISCLAIMED. IN NO EVENT SHALL OVH SAS AND CONTRIBUTORS BE LIABLE FOR ANY
# DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
# (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
# LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
# ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
# (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
# SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
/**
 * This file contains code about \Ovh\Sms\Sms class
 */

namespace Ovh\Sms;

use Ovh\Api;
use Ovh\SmsApi;

/**
 * Test SmsApi class
 *
 * @package  Ovh
 * @category Ovh
 */
class SmsApiTest
{   

    /**
     * @var \Ovh\Api
     */
    private $conn = null;

    /**
     * @var string
     */
    private $account = null;

    /**
     * Define id to create object
     */
    protected function setUp()
    {
        $this->application_key    = 'app_key';
        $this->application_secret = 'app_secret';
        $this->consumer_key       = 'consumer';
        $this->endpoint           = 'ovh-eu';

        $this->client = new Client();
    }

    /**
     * Get private and protected method to unit test it
     *
     * @param string $name
     *
     * @return \ReflectionMethod
     */
    protected static function getPrivateMethod($name)
    {
        $class  = new \ReflectionClass('Ovh\Api');
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }

    /**
     * Get private and protected property to unit test it
     *
     * @param string $name
     *
     * @return \ReflectionProperty
     */
    protected static function getPrivateProperty($name)
    {
        $class    = new \ReflectionClass('Ovh\Api');
        $property = $class->getProperty($name);
        $property->setAccessible(true);

        return $property;
    }

    /**
     * Test missing $application_key
     */
    public function testMissingApplicationKey()
    {
        $this->setExpectedException('\\Ovh\\Exceptions\\InvalidParameterException', 'Application key');
        new SmsApi(null, $this->application_secret, $this->endpoint, $this->consumer_key, $this->client);
    }

    /**
     * Test missing $application_secret
     */
    public function testMissingApplicationSecret()
    {
        $this->setExpectedException('\\Ovh\\Exceptions\\InvalidParameterException', 'Application secret');
        new SmsApi($this->application_key, null, $this->endpoint, $this->consumer_key, $this->client);
    }

    /**
     * Test missing $api_endpoint
     */
    public function testMissingApiEndpoint()
    {
        $this->setExpectedException('\\Ovh\\Exceptions\\InvalidParameterException', 'Endpoint');
        new SmsApi($this->application_key, $this->application_secret, null, $this->consumer_key, $this->client);
    }

    /**
     * Test creating Client if none is provided
     */
    public function testClientCreation()
    {
        $Sms = new SmsApi($this->application_key, $this->application_secret, $this->endpoint, $this->consumer_key);

        $this->assertInstanceOf('\\Ovh\\Api', $api->getConnection());
    }

}
