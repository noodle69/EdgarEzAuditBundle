<?php

namespace Edgar\EzUIAuditBundle\Audit\ObjectState;

use Edgar\EzUIAudit\Audit\AbstractAudit;
use eZ\Publish\Core\SignalSlot\Signal;

class DeleteObjectStateAudit extends AbstractAudit
{
    public function receive(Signal $signal)
    {
        if (!$signal instanceof Signal\ObjectStateService\DeleteObjectStateSignal
            || !$this->auditService->isConfigured(self::class)
        ) {
            return;
        }

        $this->infos = [
            'objectStateId' => $signal->objectStateId,
        ];

        $this->auditService->log($this);
    }
}
