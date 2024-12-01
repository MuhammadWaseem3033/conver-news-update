{{-- <?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach ($urls as $url)
        <url>
            <loc>{{ $url['url'] }}</loc>
            <priority>{{ $url['priority'] }}</priority>
            <changefreq>{{ $url['frequency'] }}</changefreq>
            <lastmod>{{ $url['lastmod'] }}</lastmod>
            <type>{{ $url['type'] }}</type>
            @if (!empty($url['images']))
                @foreach ($url['images'] as $image)
                    <image:image>
                        <image:loc>{{ $image['url'] }}</image:loc>
                        @if (isset($image['title']))
                            <image:title>{{ $image['title'] }}</image:title>
                        @endif
                    </image:image>
                @endforeach
            @endif
            <news:news>
                <news:publication>
                    <news:name>cover news update</news:name>
                    <news:language>en</news:language>
                </news:publication>
                <news:publication_date>{{ $url['lastmod'] }}</news:publication_date>
                <news:title>{{ $url['title'] }}</news:title>
            </news:news>
        </url>
    @endforeach

</urlset> --}}
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach ($urls as $url)
        <url>
            <loc>{{ $url['url'] }}</loc>
            <priority>{{ $url['priority'] }}</priority>
            <changefreq>{{ $url['frequency'] }}</changefreq>
            <lastmod>{{ $url['lastmod'] }}</lastmod>
            <type>Sitemap</type>

            {{-- Show images if available --}}
            @if (!empty($url['images']))
                @foreach ($url['images'] as $image)
                    <image:image>
                        <image:loc>{{ $image['url'] }}</image:loc>
                        @if (isset($image['title']))
                            <image:title>{{ $image['title'] }}</image:title>
                        @endif
                    </image:image>
                @endforeach
            @endif

            {{-- Show news details only for news and categories --}}
            @if (in_array($url['type'], ['news', 'category']))
                <news:news>
                    <news:publication>
                        <news:name>Cover News Update</news:name>
                        <news:language>en</news:language>
                    </news:publication>
                    <news:publication_date>{{ $url['lastmod'] }}</news:publication_date>
                    <news:title>{{ $url['title'] }}</news:title>
                </news:news>
            @endif
        </url>
    @endforeach
</urlset>
