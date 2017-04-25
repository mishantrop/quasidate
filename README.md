# quasiDate
quasiDate is a MODX Revolution Extra that formats dates.
# Usage #
Placeholder `[[+createdon]]` contains unix timestamp.
## Example 1 ##
[[+createdon:quasiDate=\`%j %month %Y\`]]
## Result ##
5 июля 1992
## Example 2 ##
[[+createdon:quasiDate=\`%j %month %Y\` &cultureKey=\`ua\`]]
## Result ##
5 липня 1992
# Roadmap #
* Weekday