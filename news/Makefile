
CHANGELOGS	:= \
	../../sonic-visualiser/CHANGELOG \
	../../sonic-annotator/CHANGELOG \
	../../tony/CHANGELOG \
	../../sonic-lineup/CHANGELOG

POLYRUN		:= ../../sml-buildscripts/polyrun

index.html: $(CHANGELOGS) $(POLYRUN)
	cat $(CHANGELOGS) | $(POLYRUN) scripts/changelog2news.sml
	$(POLYRUN) scripts/news2htmlindex.mlb

