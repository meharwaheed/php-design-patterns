<?php

namespace DesignPatterns\Creational\Structural\Bridge;

/**
 * The Abstraction.
 */
abstract class Page
{
    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * The Abstraction is usually initialized with one of the Implementation
     * objects.
     */
    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * The Bridge pattern allows replacing the attached Implementation object
     * dynamically.
     */
    public function changeRenderer(Renderer $renderer): void
    {
        $this->renderer = $renderer;
    }

    /**
     * The "view" behavior stays abstract since it can only be provided by
     * Concrete Abstraction classes.
     */
    abstract public function view(): string;
}