<?php

/**
 *
 * Function code for the complex acot() function
 *
 * @copyright  Copyright (c) 2013-2018 Mark Baker (https://github.com/MarkBaker/PHPComplex)
 * @license    https://opensource.org/licenses/MIT    MIT
 */
namespace Complex;

/**
 * Returns the inverse cotangent of a complex number.
 *
 * @param     Complex|mixed    $complex    Complex number or a numeric value.
 * @return    Complex          The inverse cotangent of the complex argument.
 * @throws    Exception        If argument isn't a valid real or complex number.
 * @throws    \InvalidArgumentException    If function would result in a division by zero
 */
if (!function_exists(__NAMESPACE__ . '\\acot')) {
    function acot($complex): Complex
    {
        $complex = Complex::validateComplexArgument($complex);

        return atan(inverse($complex));
    }
}
