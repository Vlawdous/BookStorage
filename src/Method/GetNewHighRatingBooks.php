<?php

namespace App\Method;

use App\Model\RpcModel\NewHighRatingBooksFetcher;
use Timiki\Bundle\RpcServerBundle\Attribute as RPC;
use Symfony\Component\Validator\Constraints as Assert;

#[Rpc\Method("getNewHighRatingBooks")]
class GetNewHighRatingBooks
{
    #[Assert\Type("int")]
    private int $daysInterval = 60;

    private NewHighRatingBooksFetcher $fetcher;

    public function __construct(NewHighRatingBooksFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    #[Rpc\Execute]
    public function execute(): array
    {
        return $this->fetcher->getNewHighRatingBooks($this->daysInterval);
    }
}