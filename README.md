# ![Screenshot](resources/img/HopReveal.png) Hop Reveal plugin for Craft CMS 3.x

Hop Reveal gives site editors a quick and helpful visual cue to which server they are working on -- staging, development or production -- on both front-end and back-end website pages. (Surely we aren't the only ones who sometimes get mixed up!) Choose the text and color of the labels yourself. You can even make the labels visible to all users if you desire. 

This plugin also provides a handy utilities page where you can view key environment variables useful during development. Some of the many variables included are GATEWAY_INTERFACE, HTTP_ACCEPT, HTTP_COOKIE, HTTP_USER_AGENT, and that's just for starters.

Get important information faster when you use Hop Reveal for Craft CMS.



## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require hopstudios/hop-reveal

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Hop Reveal.

## Hop Reveal Overview

Visual indicator of staging, development and production servers; shows key config variables

## Config for Hop Reveal

After installation, please find the Config settings under Settings->Hop Reveal. You will find two sets of config options.

### Banner Visibility
These options allow you to control visibility of the environment banner for the frontend or control panel. Options are:
- Hide (Hide the banner completely for everyone)
- Show to admins
- Show to everyone

### Environment Labels
Labels and colours for the banner which appears at the top of your Control Panel.
Set a label which will appear in the banner for each of your environments. You may also specify a colour for the banner.

## Utilities for Hop Reveal

Additionally, you may find the full list of config variables under the Utilities->Hop Reveal menu.



Brought to you by [Hop Studios](hopstudios.com)
