# mars-fisher

Rod kit - A collection of reverse engineering and web security tools.

## Overview

This repository contains a collection of tools and utilities for web application analysis, API reverse engineering, and security testing.

## Components

### mitmproxy2swagger
Automatic conversion tool from mitmproxy captures to OpenAPI 3.0 specifications. Enables automatic REST API reverse-engineering by capturing and analyzing HTTP traffic.

**Key Features:**
- Convert mitmproxy flow captures to OpenAPI specs
- Support for HAR file processing from browser DevTools
- Automatic endpoint detection and schema generation
- Safe merging of multiple capture sessions

See [mitmproxy2swagger/README.md](mitmproxy2swagger/README.md) for detailed documentation.

### hyawei
Web application components including page templates and admin panel.

### oldrod
Web hosting and administration tools with UI components.

### santander
Assets, helpers, and system utilities for web applications.

## Requirements

- Python 3.9+
- Poetry (for dependency management)

## Installation

```bash
# Install dependencies using poetry
poetry install
```

## Usage

Refer to individual component directories for specific usage instructions.

## License

MIT
