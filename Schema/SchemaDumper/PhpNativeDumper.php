<?php

declare(strict_types=1);

/*
 * This file is part of the slince/cycle-bundle package.
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alms\Bundle\CycleBundle\Schema\SchemaDumper;

use DateTime;
use DateTimeInterface;

final class PhpNativeDumper extends Dumper
{
    public function dump(array $options = []): string
    {
        return sprintf(<<<EOT
<?php

// This file has been auto-generated by the Cycle bundle.
// Generated on %s

use Cycle\ORM\Schema;

\$data = %s;

return new Schema(\$data);
EOT
            ,
            (new DateTime())->format(DateTimeInterface::ATOM),
            var_export($this->getSchema()->toArray(), true)
        );
    }
}