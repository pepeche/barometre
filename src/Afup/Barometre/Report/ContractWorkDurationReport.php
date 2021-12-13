<?php

declare(strict_types=1);

namespace Afup\Barometre\Report;

class ContractWorkDurationReport extends AbstractReport
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'contract_work_duration_report';
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $this->queryBuilder
            ->select('response.contractWorkDuration')
            ->addSelect('COUNT(response.id) as nbResponse')
            ->having('nbResponse >= :minResult')
            ->setParameter(':minResult', $this->minResult)
            ->groupBy('response.contractWorkDuration')
            ->orderBy('nbResponse', 'desc');

        $this->data = $this->queryBuilder->execute()->fetchAll();
    }
}
