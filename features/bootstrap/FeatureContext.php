<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use org\bovigo\vfs\vfsStream;

/**
 * Behat context class.
 */
class FeatureContext implements SnippetAcceptingContext {

	protected $filesystem;
	protected $config;
	protected $sut;

	/**
	 * Initializes context.
	 *
	 * Every scenario gets its own context object.
	 * You can also pass arbitrary arguments to the context constructor through behat.yml.
	 */
	public function __construct()
	{
		$this->config = [];
	}

	/**
	 * @Given there is a configuration file
	 */
	public function thereIsAConfigurationFile()
	{
		$this->updateConfig();
	}

	/**
	 * @Given the option :arg1 is configured to :arg2
	 */
	public function theOptionIsConfiguredTo($arg1, $arg2)
	{
		$this->config[$arg1] = $arg2;
		$this->updateConfig();
	}

	/**
	 * @When I load the configuration file
	 */
	public function iLoadTheConfigurationFile()
	{
		$this->sut = Config::load(vfsStream::url('home/config.php'));
	}

	/**
	 * @Then I should get :value as :option option
	 */
	public function iShouldGetAsOption($value, $option)
	{
		$actual = $this->sut->get($option);

		if ($actual !== $value)
			throw new Exception("Expected {$option} to be '{$value}'!");
	}

	/**
	 * @Given the option :arg1 is not yet configured
	 */
	public function theOptionIsNotYetConfigured($arg1)
	{
		$this->config = [];
		$this->updateConfig();
	}

	/**
	 * @Then I should get default value :default as :option
	 */
	public function iShouldGetDefaultValueAs($default, $option)
	{
		$actual = $this->sut->get($option, $default);

		if ($actual !== $default)
			throw new Exception("Expected default of '{$default}' to be returned for {$option}, not '{$actual}'.");
	}

	/**
	 * @When I set the :$option configuration option to :value
	 */
	public function iSetTheConfigurationOptionTo($option, $value)
	{
		$this->sut->set($option, $value);
	}

	/**
	 * @When I set the :option configuration option to :value
	 */
	public function iSetTheConfigurationOptionTo2($option, $value)
	{
		$this->sut->set($option, $value);
	}

	private function updateConfig()
	{
		$config = '<?php return ' . var_export($this->config, true) . ';';

		$this->filesystem = vfsStream::setup('home', null, [
			'config.php' => $config
		]);
	}

}