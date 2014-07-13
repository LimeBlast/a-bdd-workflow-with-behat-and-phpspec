<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Behat context class.
 */
class FeatureContext implements SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given there is a configuration file
     */
    public function thereIsAConfigurationFile()
    {
        throw new PendingException();
    }

    /**
     * @Given the option :arg1 is configured to :arg2
     */
    public function theOptionIsConfiguredTo($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When I load the configuration file
     */
    public function iLoadTheConfigurationFile()
    {
        throw new PendingException();
    }

    /**
     * @Then I should get :arg1 as :arg2 option
     */
    public function iShouldGetAsOption($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given the option :arg1 is not yet configured
     */
    public function theOptionIsNotYetConfigured($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get default value :arg1 as :arg2 option
     */
    public function iShouldGetDefaultValueAsOption($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When I set the :arg1 configuration option to :arg2
     */
    public function iSetTheConfigurationOptionTo($arg1, $arg2)
    {
        throw new PendingException();
    }
}
