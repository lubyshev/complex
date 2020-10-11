<?php
declare(strict_types=1);

namespace Complex;

/**
 * Class ComplexImmutable.
 * Complex number representation.
 *
 * @package Complex
 */
class ComplexImmutable
{
    /**
     * Real part of number.
     *
     * @var float
     */
    private float $real;

    /**
     * Imaginary part of number.
     *
     * @var float
     */
    private float $imaginary;

    /**
     * ComplexImmutable constructor.
     *
     * @param float $real
     * @param float $imaginary
     */
    public function __construct(float $real, float $imaginary = .0)
    {
        $this->real      = $real;
        $this->imaginary = $imaginary;
    }

    /**
     * Converters Complex to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('(%f;%f)', $this->real, $this->imaginary);
    }

    /**
     * Returns the sum of of $this and $value.
     *
     * @param ComplexImmutable $value
     *
     * @return ComplexImmutable
     */
    public function add(ComplexImmutable $value): ComplexImmutable
    {
        return new ComplexImmutable(
            $this->getReal() + $value->getReal(),
            $this->getImaginary() + $value->getImaginary(),
        );
    }

    /**
     * Returns the difference between $this and $value.
     *
     * @param ComplexImmutable $value
     *
     * @return ComplexImmutable
     */
    public function sub(ComplexImmutable $value): ComplexImmutable
    {
        return new ComplexImmutable(
            $this->getReal() - $value->getReal(),
            $this->getImaginary() - $value->getImaginary(),
        );
    }

    /**
     * Returns the product of $this and $value.
     *
     * @param ComplexImmutable $value
     *
     * @return ComplexImmutable
     */
    public function mul(ComplexImmutable $value): ComplexImmutable
    {
        $a = $this->getReal();
        $b = $this->getImaginary();
        $c = $value->getReal();
        $d = $value->getImaginary();

        return new ComplexImmutable(
            $a * $c - $b * $d,
            $a * $d + $b * $c
        );
    }

    /**
     * Returns the quotient of $this divided by $value.
     *
     * @param ComplexImmutable $value
     *
     * @return ComplexImmutable
     */
    public function div(ComplexImmutable $value): ComplexImmutable
    {
        $a   = $this->getReal();
        $b   = $this->getImaginary();
        $c   = $value->getReal();
        $d   = $value->getImaginary();
        $div = $c * $c + $d * $d;

        return new ComplexImmutable(
            ($a * $c + $b * $d) / $div,
            ($b * $c - $a * $d) / $div
        );
    }

    /**
     * Returns real part of number.
     *
     * @return float
     */
    public function getReal(): float
    {
        return $this->real;
    }

    /**
     * Returns imaginary part of number.
     *
     * @return float
     */
    public function getImaginary(): float
    {
        return $this->imaginary;
    }

}
