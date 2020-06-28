<?php

/**
 * This file is part of Gitonomy.
 *
 * (c) Alexandre Salomé <alexandre.salome@gmail.com>
 * (c) Julien DIDIER <genzo.wm@gmail.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Artista\Models\Digital\Code\Message;

use Artista\Models\Digital\Code\Message;

/**
 * @author Julien DIDIER <genzo.wm@gmail.com>
 */
class OpenMessage extends Message
{
    public function getName()
    {
        return 'open';
    }
}
