<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Form\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Class PathBlacklistPathUniqueConstraintValidator
 * @package Pyz\Zed\PathBlacklistGui\Communication\Form\Constraint
 */
class PathBlacklistPathUniqueConstraintValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof PathBlacklistPathUniqueConstraint) {
            throw new UnexpectedTypeException($constraint, PathBlacklistPathUniqueConstraint::class);
        }

        $pathBlacklistCollectionTransfer = $constraint->getPathBlacklistFacade()->findPathBlacklistByPath($value);
        if (empty($pathBlacklistCollectionTransfer->getPathBlacklists())) {
            return;
        }

        if (count($pathBlacklistCollectionTransfer->getPathBlacklists()) == 1
            && $pathBlacklistCollectionTransfer->getPathBlacklists()[0]->getIdPathBlacklist() === (int)$this->context->getRoot()->getViewData()->getIdPathBlacklist()) {
            return;
        }

        $this->context
            ->buildViolation($constraint->message)
            ->addViolation();
    }
}
