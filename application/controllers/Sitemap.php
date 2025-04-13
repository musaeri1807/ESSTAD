<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sitemap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load model jika perlu ambil dari database (opsional)
    }

    public function index()
    {
        header('Content-Type: application/xml; charset=utf-8');

        $base = base_url();

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Static pages
        $pages = [
            'login',
            'register',
            'forgot'
        ];

        foreach ($pages as $page) {
            echo "  <url>\n";
            echo "    <loc>{$base}{$page}</loc>\n";
            echo "    <changefreq>monthly</changefreq>\n";
            echo "    <priority>0.9</priority>\n";
            echo "  </url>\n";
        }

        echo "</urlset>";
    }

    public function robots()
    {
        header('Content-Type: text/plain');
        echo "User-agent: *\n";
        echo "Allow: /\n\n";
        echo "Sitemap: " . base_url('sitemap') . "\n";
    }
}
