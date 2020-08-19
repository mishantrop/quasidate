# quasiDate
quasiDate is a MODX Revolution Extra that formats dates.

## Examples ##
Placeholder `[[+createdon]]` contains unix timestamp.

### Source ###
[[+createdon:quasiDate=\`%j %month %Y\`]]
### Result ###
5 июля 1992

### Source ###
[[+createdon:quasiDate=\`%j %month %Y\` &cultureKey=\`ua\`]]
### Result ###
5 липня 1992
