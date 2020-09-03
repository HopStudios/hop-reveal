# Hop Reveal plugin for Craft CMS 3.x

Hop Reveal

![Screenshot](resources/img/plugin-logo.png)

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

This plugin helps developers in two ways. First, it places a banner across the top of your window (both frontend and backend), identifying which environment you're currently working on. This is useful for anyone who has access to more than just the production site. Second, it gathers all of your config variables into one place for easy reference.

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
