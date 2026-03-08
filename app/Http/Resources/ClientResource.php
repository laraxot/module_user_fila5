<?php

declare(strict_types=1);

namespace Modules\User\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Models\OauthClient as Client;

/**
 * @property \Modules\User\Models\User|null $owner
 *
 * @mixin Client
 */
final class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        return [
            'id' => // @var mixed id,
            'name' => // @var mixed name,
            'owner' => // @var mixed when(
                isset(// @var mixed owner
                fn (): OwnerResource => new OwnerResource(// @var mixed owner
            ),
        ];
    }
}
