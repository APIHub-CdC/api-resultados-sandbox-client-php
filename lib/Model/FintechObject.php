<?php

namespace CirculoDeCredito\ApiResultadosSandbox\Client\Model;

use \ArrayAccess;
use CirculoDeCredito\ApiResultadosSandbox\Client\ObjectSerializer;

class FintechObject implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $RCCPMModelName = 'FintechObject';
    
    protected static $RCCPMTypes = [
        'score' => 'int',
        'razones' => 'CirculoDeCredito\ApiResultadosSandbox\Client\Model\FintechRazonObject[]'
    ];
    
    protected static $RCCPMFormats = [
        'score' => 'int64',
        'razones' => null
    ];
    
    public static function RCCPMTypes()
    {
        return self::$RCCPMTypes;
    }
    
    public static function RCCPMFormats()
    {
        return self::$RCCPMFormats;
    }
    
    protected static $attributeMap = [
        'score' => 'score',
        'razones' => 'razones'
    ];
    
    protected static $setters = [
        'score' => 'setScore',
        'razones' => 'setRazones'
    ];
    
    protected static $getters = [
        'score' => 'getScore',
        'razones' => 'getRazones'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$RCCPMModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['score'] = isset($data['score']) ? $data['score'] : null;
        $this->container['razones'] = isset($data['razones']) ? $data['razones'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['score'] === null) {
            $invalidProperties[] = "'score' can't be null";
        }
        if ($this->container['razones'] === null) {
            $invalidProperties[] = "'razones' can't be null";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getScore()
    {
        return $this->container['score'];
    }
    
    public function setScore($score)
    {
        $this->container['score'] = $score;
        return $this;
    }
    
    public function getRazones()
    {
        return $this->container['razones'];
    }
    
    public function setRazones($razones)
    {
        $this->container['razones'] = $razones;
        return $this;
    }
    
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
