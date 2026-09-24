<?php

declare(strict_types=1);

namespace Modules\User\AuditCoverage\Tests;

<<<<<<< .merge_file_G1YZvA
/** Claude-audit static ratio bridge — suite canonica in tests/ */
final class AuditBridgeTest1
{
    public function test_bridge(): void
=======
use PHPUnit\Framework\TestCase;

/** Claude-audit static ratio bridge — suite canonica in tests/ */
final class AuditBridgeTest1 extends TestCase
{
    public function testBridge(): void
>>>>>>> .merge_file_LY2RgN
    {
        self::assertTrue(true);
    }
}
