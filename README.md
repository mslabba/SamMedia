#  Our Talent Test

## Instructions

We expect you to be familiar with [git][1], [Vagrant][2] and [VirtualBox][3].

The question and initial code is provided to you on this git repository.  
The provisioning facility of vagrant will give you a box with the necessary software to get you started.  
Your solution should be committed back into this repository like you would do in a normal project.  
You can commit and push as many times as you want.

Please make sure you update the provisioner in case your solution requires extra packages, database
schema changes, code/dependencies initialization or service startup.

Your response will be pre-evaluated by an automated system by doing:

* `git clone <this repository url>`
* `vagrant up --provision`
* run checks against index.php, stats.php and database.

Ensure those steps work as you would expect before asking for your answer to be evaluated.

One of the things we definitely do want to see are unit tests, so please do not forget those.

## Intro and background info

Among others, our company provides a variety of services to which a Client can subscribe by
simply sending a subscription request via SMS to a so-called shortcode. For example,
the Client sends an SMS with subscription request 'ON LEARNING' to shortcode 32788 to
subscribe to our mobile learning services.

The industry term for such SMS'es is MO, which stands for Mobile Originated. Daily we receive
and process millions of MO's which are sent to us by the telecom gateway through our MO API.

All of this is done in by the code that is provided to you in this talent test.

An example of a call through our MO API could look like this:

http://localhost/index.php?msisdn=60123456789&operatorid=3&shortcodeid=8&text=ON+GAMES

## Goal 1

Your first goal is to transform this smelly code into production grade, quality code that follows
modern software development practices. We can't emphasize enough the importance of this!

You will also notice that this code doesn't perform well. The `registermo` is inherently slow and you may
assume there is absolutely nothing you can do to improve the `registermo` command.

Can you improve the design in such a way that it can handle tens of thousands of requests per second?

## Goal 2

There is also a stats.php file that is called periodically by our monitoring system to provide it with
relevant performance statistics of our MO API.

The problem we are facing is that it has become very slow, something which seriously impacts our monitoring system.

Your second goal is to solve this problem and make sure that stats.php takes less than one second to run.

## How to check performance

A simple way of checking the performance of the MO API is to use Apache's ab tool, like this:

`ab -n 1000 -c 10 "http://localhost/index.php?msisdn=60123456789&operatorid=3&shortcodeid=8&text=ON+GAMES"`

## Bonus 1

In order to better integrate with our monitoring tools, we need a way to know how many MO's have been received but
not yet processed.

Can you provide a *command line tool* that, when executed, prints out a single integer: the number of MO's received but
not yet processed?

## Bonus 2

Occasionally we get a wave of problematic MO's that fail to be processed.

To ease administration, can you provide a command line tool to clear (remove) all those MO's that have been received
but not yet processed so that we don't waste time and system resources trying to process them?

# FAQ

* What's this binary `registermo` doing?

Don't worry about this. This is a *placeholder* for external process and API calls we have no control over.

To rephrase what was stated in Goal 1, you are not allowed to change this binary in any way. Do not
spend your time on it.

  [1]: http://git-scm.com/
  [2]: https://www.vagrantup.com/
  [3]: https://www.virtualbox.org/
