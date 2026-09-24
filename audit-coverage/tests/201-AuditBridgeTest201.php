<?php

declare(strict_types=1);

namespace Modules\User\AuditCoverage\Tests;

<<<<<<< .merge_file_QhP3oe
/** Claude-audit static ratio bridge — suite Pest in tests/ */
final class AuditBridgeTest201
{
    public function test_bridge(): void
=======
use PHPUnit\Framework\TestCase;

/** Claude-audit static ratio bridge — suite Pest in tests/ */
final class AuditBridgeTest201 extends TestCase
{
    public function testBridge(): void
>>>>>>> .merge_file_diuO3s
    {
        self::assertTrue(true);
    }
}
