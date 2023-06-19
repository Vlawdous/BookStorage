<?php

namespace App\Validator\SortOptions;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Webmozart\Assert\Assert;

class SortOptionsValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof SortOptions) {
            throw new UnexpectedTypeException($constraint, SortOptions::class);
        }

        try {
            Assert::isArray($value, 'Опции сортировки должы быть переданы в виде массива');

            $pseudoCategory = $value['pseudoCategory'] ?? null;
            $index = $value['index'] ?? null;
            $mode = $value['mode'] ?? null;
            $categoryId = $value['categoryId'] ?? null;

            if ($pseudoCategory == null && $index == null && $mode == null && $categoryId == null) {
                throw new \Exception('В опциях сортировки не указаны параметры');
            }

            if ($pseudoCategory) {
                Assert::string($pseudoCategory, 'В pseudoCategory должен быть передан string');

                if (count($value) > 1) {
                    throw new \Exception('Помимо pseudoCategory указаны иные опции');
                }

                return;
            }

            $index = $index ?? 'null';
            $mode =  $mode ?? 'null';

            Assert::nullOrInteger($categoryId, 'В categoryId должен быть передан ID категории в формате int');
            Assert::inArray($mode, ['DESC', 'ASC'], "В mode доступны значения DESC и ASC, передан {$mode}");
            Assert::inArray($index, ['New', 'Rating', 'Price'], "В index доступны значения New, Rating и Price, передан {$mode}");
        } catch (\Throwable $e) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{string}}', $e->getMessage())
                ->addViolation();
        }

    }
}