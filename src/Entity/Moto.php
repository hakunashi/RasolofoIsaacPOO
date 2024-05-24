<?php

namespace Src\Entity;

use JsonSerializable;

class Moto implements JsonSerializable{
    private int $id;
    private string $brand;
    private string $model;
    private string $type;
    private float $price;
    private string $imageUrl;

    public function __construct(int $id, string $brand, string $model, string $type, float $price, string $imageUrl) {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
    }

    public function jsonSerialize(): array
    {

        return [
            "id" => $this->getId(),
            "brand" => $this->getBrand(),
            "model" => $this->getModel(),
            "type" => $this->getType(),
            "price" => $this->getPrice(),
            "imageUrl" => $this->getImageUrl(),
        ];
    }

    static public function fromArray(array $array): self
    {
        return new self($array["id"], $array["brand"], $array["model"], $array["type"], $array["price"], $array["image"]);
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of brand
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @return  self
     */ 
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of imageUrl
     */ 
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set the value of imageUrl
     *
     * @return  self
     */ 
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }
}

?>