<?php

namespace App\Method;

use App\Model\Rpc\ProductFetcher;
use Timiki\Bundle\RpcServerBundle\Attribute as RPC;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\SortOptions\SortOptions as SortOptionsAssert;

#[Rpc\Method("getProducts")]
class GetProducts
{
    #[Rpc\Param]
    #[Assert\NotBlank]
    #[Assert\Type("string")]
    #[Assert\Choice(['Book', 'Stationery', 'Household'], message: 'Неподходящий тип продукта.')]
    protected $productType;

    #[Rpc\Param]
    #[Assert\Type("int")]
    #[Assert\GreaterThanOrEqual(0, message: 'Смещение страниц не может быть меньше 0.')]
    protected $pageOffset = 0;

    #[Rpc\Param]
    #[SortOptionsAssert]
    protected $sortOptions;

    private ProductFetcher $fetcher;

    public function __construct(ProductFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    #[Rpc\Execute]
    public function execute(): array
    {
        return $this->fetcher->getProducts($this->productType, $this->pageOffset, $this->sortOptions);
    }
}