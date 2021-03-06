<?php

namespace Edgar\EzUIAuditBundle\Audit\Language;

use Edgar\EzUIAudit\Audit\AbstractAudit;
use eZ\Publish\Core\SignalSlot\Signal;

class CreateLanguageAudit extends AbstractAudit
{
    public function receive(Signal $signal)
    {
        if (!$signal instanceof Signal\LanguageService\CreateLanguageSignal
            || !$this->auditService->isConfigured(self::class)
        ) {
            return;
        }

        $this->infos = [
            'languageId' => $signal->languageId,
        ];

        $this->auditService->log($this);
    }
}
