
CODE_ROOT	:= ../../../..
CODE_ROOT_SV	:= $(CODE_ROOT)/sv
CODE_ROOT_SML	:= $(CODE_ROOT)/sml

CHANGELOGS	:= \
	$(CODE_ROOT_SV)/sonic-visualiser/CHANGELOG \
	$(CODE_ROOT_SV)/sonic-annotator/CHANGELOG \
	$(CODE_ROOT_SV)/tony/CHANGELOG \
	$(CODE_ROOT_SV)/sonic-lineup/CHANGELOG

TXTS		:= $(wildcard *.txt)

POLYRUN		:= $(CODE_ROOT_SML)/sml-buildscripts/polyrun

index.html: $(CHANGELOGS) $(TXTS) $(POLYRUN)
	cat $(CHANGELOGS) | $(POLYRUN) scripts/changelog2news.sml
	$(POLYRUN) scripts/news2htmlindex.mlb

