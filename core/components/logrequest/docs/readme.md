# LogRequest

Log request parameter values and display them in the dashboard.

- Author: Thomas Jakobi <thomas.jakobi@partout.info>
- License: GNU GPLv2

## Features

LogRequest is an extra for MODX to log request parameter values and display them
in dashboard widgets. It could be used i.e. to display the searched strings of a
SimpleSearch form in the dashboard.

## Installation

MODX Package Management

## Usage

Fill the MODX system setting `logrequest.trigger` with a request parameter key
(or a komma separated list of keys) that should be logged. Install the widget(s)
in the dashboard to view the logged key values.

## System Settings

LogRequest uses the following system settings in the namespace `logrequest`:

Key | Description | Default
----|-------------|--------
logrequest.trigger | Request key that triggers the request logging. | -

## Widgets

LogRequest contains two dashboard widgets to display the logged data:

Widget | Description
-------|------------
LogRequest Rank | This widget displays the request ranks
LogRequest Log  | This widget displays the logged requests

The development of LogRequest was sponsored by www.signalfeuer.info

## GitHub Repository

https://github.com/Jako/LogRequest
