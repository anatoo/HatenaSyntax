<?php
/**
 * @package HatenaSyntax
 * @author KUBOTA Mitsunori <anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * 
 */

class HatenaSyntax_Table implements PEG_IParser
{
    protected $parser, $line;

    function __construct(PEG_IParser $lineelt)
    {
        $cellbody = PEG::many(PEG::subtract($lineelt, '|'));

        $this->parser = PEG::many1(
            PEG::callbackAction(
                array($this, 'map'),
                PEG::anything()
            )
        );

        $this->line = PEG::second(
            '|',
            PEG::many1(
                PEG::optional('*'),
                $cellbody,
                PEG::drop('|')),
            PEG::eos()
        );
    }

    function parse(PEG_IContext $context)
    {
        return $this->parser->parse($context);
    }

    function map($line)
    {
        return $this->line->parse(PEG::context($line));
    }
}
