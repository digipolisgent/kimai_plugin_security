# KimaiSecurityBundle

A Kimai 2 plugin, which adds some security related functionality (like adding a
Referrer-policy header to all responses).

## Installation

First clone it to your Kimai installation `plugins` directory:
```
cd /kimai/var/plugins/
git clone https://github.com/digipolisgent/kimai_plugin_security.git KimaiSecurityBundle
```

And then rebuild the cache:
```
cd /kimai/
bin/console cache:clear
bin/console cache:warmup
```

You could also [download it as zip](https://github.com/digipolisgent/kimai_plugin_security/archive/master.zip) and upload the directory via FTP:

```
/kimai/var/plugins/
├── KimaiSecurityBundle
│   ├── KimaiSecurityBundle.php
|   └ ... more files and directories follow here ...
```
