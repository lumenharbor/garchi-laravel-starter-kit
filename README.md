# Garchi CMS — Laravel Starter Kit

A Laravel starter kit for [Garchi CMS](https://garchi.co.uk), a cloud-based
headless CMS with a full-write MCP server. Clone it, add an API key, and you
have a Laravel app rendering content from Garchi — with the option of letting
an AI agent author that content for you.

Use it as the base for a new project, or as a reference for wiring Garchi into
an existing one.

## Requirements

- PHP 8.2+
- Composer
- A free Garchi account — [sign up](https://garchi.co.uk)

## Quick start

```bash
git clone https://github.com/YOUR_ORG/garchi-laravel-starter.git
cd garchi-laravel-starter
composer install
cp .env.example .env
php artisan key:generate
```

Add your Garchi credentials to `.env`:

```env
GARCHI_API_URL=https://garchi.co.uk/api/v2
GARCHI_API_KEY=your_api_key
GARCHI_SPACE_UID=your_space_uid
```

Your API key is in the Garchi dashboard under Settings → API Keys.

```bash
php artisan serve
```

Visit `http://localhost:8000` to see the example page rendering live content.




## Let an agent build the content

Garchi CMS ships an MCP server, so an AI agent can create and edit content directly
— pages, section trees, structured data, images — while this starter kit
renders it.

Add the server to your MCP client (Claude Desktop, Claude Code, Cursor):

```json
{
  "mcpServers": {
    "GarchiCMS": {
      "url": "https://garchi.co.uk/mcp-oauth"
    }
  }
}
```

Then try: *"Run prerequisites for my Garchi space, then create an about page
with a hero and three feature sections."* Refresh your Laravel app and it's
there.

## Links

- [Documentation](https://garchi.co.uk/documentation)
- [Laravel usage guide](https://garchi.co.uk/documentation/1.0/usage/laravel)
- [API reference](https://garchi.co.uk/docs)
- Starter kits for [Next.js](https://github.com/lumenharbor/garchi-next-starter-kit) and [Nuxt](https://github.com/lumenharbor/garchi-nuxt-starter-kit)

## Licence

MIT