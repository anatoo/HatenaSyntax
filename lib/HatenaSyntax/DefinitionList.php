<?php
/**
 * @package HatenaSyntax
 * @author anatoo<anatoo@nequal.jp>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: DefinitionList.php 1574 2010-01-25 08:28:15Z anatoo $
 */

class HatenaSyntax_DefinitionList implements PEG_IParser
{
    protected $parser, $definition;

    function __construct(PEG_IParser $elt)
    {
        $dt = PEG::many(PEG::subtract($elt, ':'));
        $dd = PEG::many($elt);

        $this->parser = PEG::many1(PEG::callbackAction(
            array($this, 'map'),
            PEG::anything()
        ));

        $sep = PEG::drop(':');
        $this->definition = PEG::seq(
            $sep,
            $dt,
            $sep,
            $dd
        );
    }

    function parse(PEG_IContext $context)
    {
        return $this->parser->parse($context);
    }

    function map($line)
    {
        return $this->definition->parse(PEG::context($line));
    }
}
