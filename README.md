# FBCTF [![Build Status](https://travis-ci.org/facebook/fbctf.svg)](https://travis-ci.org/facebook/fbctf)

## What is FBCTF?

The Facebook CTF is a platform to host Jeopardy and “King of the Hill” style Capture the Flag competitions. For more information on the FBCTF, visit the [main FBCTF github](https://github.com/facebook/fbctf)

## What did I do with FBCTF

I ~~interned~~ ~~toured~~ hung-out with the e-crimes team while maintaining a FB badge for 3 weeks in July of 2017. During that time, I learned a ton about using [maltego](https://en.wikipedia.org/wiki/Maltego), but I also spent some time fixing some issues with the FBCTF platform. This was my first time working with the [hack language](https://hacklang.org/) so I had quite a learning curve but here were my main contributions:

Multiple Bugs fixed and Multiple choice feature added (see [add_multiple_choice branch](https://github.com/archang31/fbctf/tree/add_multiple_choice)).

* Fixed issue #82 (Level Bonus not reset).
* Fixed issue #421 (hint points now subtracted only after scoring level).
* Added issue #218 (multiple choice option for quizes).
* As part of issue #218, added ability to set a "wrong answer penalty" to quizes and flags (required so could not spam multiple choice answers).
* Enabled bonus and bonus dec to be set initially (fixed half of issue #19).
* Updated to pass hh_client (test cases updated to handle new parameters)
* Recommend a new test-case be added to validate multiple choice functionality.

The FBCTF platform underwent some significant changes that resulted in a rather long PR process. Plus, I was already back at USMA teaching by the time they looked at my PR. More details on the final PR here: https://github.com/facebook/fbctf/pull/549 . 

## Final Note

I know there has been a fair bit of negative Facebook press recently, but I had an awesome time working for/with Facebook and learned a lot about how a real tech company operates. I also was impressed at how much time and effort was put into finding and reporting things like child trafficking, election fraud, and other criminal abuses. I might have a slightly distorted view since I was working on the electronic-crimes team (and fighting these things was their whole reason for existence), but FB was far more invested in protecting its users than I ever would have anticipated. Whether it was goodwill towards mankind or a sneaky business model, I really learned a lot from my time with the company and am a better person/coder because of my time spent with the company.

# Installation

The FBCTF platform was designed with flexibility in mind, allowing for different types of installations depending on the needs of the end user. The FBCTF platform can be installed either in Development Mode, or Production Mode. Development is for development, and Production is intended for live events utilizing the FBCTF platform. 

[Development Installation Guide](https://github.com/facebook/fbctf/wiki/Installation-Guide,-Development)

[Production Installation Guide](https://github.com/facebook/fbctf/wiki/Installation-Guide,-Production) 

## Reporting an Issue

First, ensure the issue was not already reported by doing a search. If you cannot find an existing issue, create a new issue. Make the title and description as clear as possible, and include a test case or screenshot to reproduce or illustrate the problem if possible.

If you have issues installing the platform, please provide the entire output of the provision script in your issue. Also include any error messages you find in `/var/log/hhvm/error.log`.

## Contribute

You’ve used it, now you want to make it better? Awesome! Pull requests are welcome! Click [here](https://github.com/facebook/fbctf/blob/master/CONTRIBUTING.md) to find out how to contribute.

Facebook also has [bug bounty program](https://www.facebook.com/whitehat/) that includes FBCTF. If you find a security vulnerability in the platform, please submit it via the process outlined on that page and do not file a public issue.

## Have more questions?

Check out the [wiki pages](https://github.com/facebook/fbctf/wiki) attached to this repo.

## License

This source code is licensed under the Creative Commons Attribution-NonCommercial 4.0 International license. View the license [here](https://github.com/facebook/fbctf/blob/master/LICENSE).
