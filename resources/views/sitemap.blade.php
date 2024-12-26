{{-- <?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach ($urls as $url)
        <url>
            <loc>{{ $url['url'] }}</loc>
            <priority>{{ $url['priority'] }}</priority>
            <changefreq>{{ $url['frequency'] }}</changefreq>
            <lastmod>{{ $url['lastmod'] }}</lastmod>
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
            {{-- @dd($url['public_date']) --}}
            @if ($url['is_news'])
                <news:news>
                    <news:publication>
                        <news:name>Cover News Update</news:name>
                        <news:language>en</news:language>
                    </news:publication>
                    <news:genres>News</news:genres>
                    <news:publication_date>{{ \Carbon\Carbon::parse($url['lastmod'])->format('Y-m-d') }}</news:publication_date>
                    <news:title>{{ $url['title'] }}</news:title>
                    @if (!empty($url['meta_keyword']))
                        <news:keywords>{{ implode(',', $url['meta_keyword']) }}</news:keywords>
                    @endif
                </news:news>
            @endif
        </url>
    @endforeach
</urlset>
