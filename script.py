from __future__ import unicode_literals
import youtube_dl, sys, json

ydl_opts = {}
url = sys.argv[1]
with youtube_dl.YoutubeDL(ydl_opts) as ydl:
    info_dict = ydl.extract_info(url, download=False)
    for format in info_dict['formats']:
        if format['ext'] == 'm4a':
            audio_url = format['url']
            print(audio_url)