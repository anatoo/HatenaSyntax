<?php
/**
 * @package HatenaSyntax
 * @author KUBOTA Mitsunori <anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * 
 */

class HatenaSyntax_Pre implements PEG_IParser
{
    protected $line, $parser;

    function __construct(PEG_IParser $elt)
    {
        $this->line = PEG::many($elt);

        $end = new HatenaSyntax_Regex('/\|<$/');
        $this->parser = PEG::callbackAction(
            array($this, 'map'),
            PEG::seq(
                PEG::drop('>|'),
                PEG::many(PEG::subtract(PEG::anything(), $end)),
                $end
            )
        );
    }

    function parse(PEG_IContext $context)
    {
        return $this->parser->parse($context);
    }

    function map(Array $pre)
    {
        list($body, $end) = $pre;

        if ($end !== '|<') {
            $body[] = substr($end, 0, -2);
        }

        foreach ($body as &$line) {
            $line = $this->line->parse(PEG::context($line));
        }

        return $body;
    }
}
