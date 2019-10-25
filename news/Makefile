
CHANGELOGS	:= \
	../../sonic-visualiser/CHANGELOG \
	../../sonic-annotator/CHANGELOG \
	../../tony/CHANGELOG \
	../../sonic-lineup/CHANGELOG

TXTS		:= $(wildcard *.txt)

POLYRUN		:= ../../sml-buildscripts/polyrun

index.html: $(CHANGELOGS) $(TXTS) $(POLYRUN)
	cat $(CHANGELOGS) | $(POLYRUN) scripts/changelog2news.sml
	$(POLYRUN) scripts/news2htmlindex.mlb

