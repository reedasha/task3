from __future__ import unicode_literals
import youtube_dl, sys, json

ydl_opts = {
    'outtmpl': './storage/app/public/%(title)s-%(id)s.%(ext)s',
    'format': 'bestaudio/best',
    'postprocessors': [{
        'key': 'FFmpegExtractAudio',
        'preferredcodec': 'mp3',
        'preferredquality': '192',
    }],
}
url = sys.argv[1]
with youtube_dl.YoutubeDL(ydl_opts) as ydl:
    info_dict = ydl.extract_info(url, download=True)
    formats = info_dict['formats'][0]
    video_title = info_dict.get('title')
    id = str(info_dict.get('id'))
    ext = info_dict.get('ext')  
    final = video_title + '-' + id + '.mp3'
    print(final)