<?php

namespace Afup\BarometreBundle\Filter;


class Factory
{
    public function create($code)
    {
        switch ($code) {
            case 'company_size':
                return new \Afup\BarometreBundle\Filters\CompanySize();
            break;
            case 'company_type':
                return new \Afup\BarometreBundle\Filters\CompanyType();
            break;
            default:
                throw new \InvalidArgumentException(sprintf('Code "%s" invalid', $code));
            break;
        }
    }
}
