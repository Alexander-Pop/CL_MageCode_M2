Main Magento 2 log class is “Magento\Framework\Logger\Monolog” and is defined in “MAGENTO2_ROOT/app/etc/di.xml”

<preference for=”Psr\Log\LoggerInterface” type=”Magento\Framework\Logger\Monolog”>

As mentioned before Monolog is a powerful logging tool that allows the user to use a wide range of handlers to their benefit, such as logging to files and syslog, sending alerts and e-mails, logging database activity, etc.

Logger class has 8 levels of logs and methods for each of those levels, usage of these methods depends on the type of the message user is logging.

Each of these methods accepts 2 arguments, first one is the message itself ( string) and the second one is an optional array (for example instance of an Exception object)

<?php
$this->_logger->emergency($message, array $context = array());  //saved in var/log/system.log
$this->_logger->alert($message, array $context = array())  //saved in var/log/system.log
$this->_logger->critical($message, array $context = array())  //saved in var/log/system.log
$this->_logger->error($message, array $context = array())  //saved in var/log/system.log
$this->_logger->warning($message, array $context = array())  //saved in  var/log/system.log
$this->_logger->notice($message, array $context = array())  //saved in var/log/system.log
$this->_logger->info($message, array $context = array())  //saved in var/log/system.log
$this->_logger->debug($message, array $context = array())  //saved in var/log/debug.log (does not work in production mode)
?>

There is another method that can be used to log something with an arbitrary level passed as  first parameter

<?php $this->_logger-> log($level, $message, array $context = array()); ?>

https://inchoo.net/magento-2/magento-2-logging/