# Playbooks

Demo and reference playbook library for **Ansible Automation Platform (AAP)**. Organized by platform and integration — used for customer POCs, demos, and day-2 operations.

> AWS playbooks have been moved to [redawg/AWS_Playbooks](https://github.com/redawg/AWS_Playbooks)

---

## Repository Structure

```
Playbooks/
├── AnsibleEE/          # Execution Environment utilities
├── Azure/              # Azure VM and network provisioning
├── Controller/         # AAP Controller API and management
├── dynatrace/          # Dynatrace OneAgent install/uninstall
├── ESXi/               # VMware ESXi VM deployment
├── infoblox/           # Infoblox DNS record management
├── lamp_simple/        # LAMP stack deploy (RHEL 7)
├── lamp_simple_rhel8/  # LAMP stack deploy (RHEL 8)
├── Lightspeed_Demo/    # Ansible Lightspeed demo plays
├── Netfacts/           # Network fact gathering
├── Network/            # Network device automation (IOS/NX-OS/ASA/EOS)
├── NetworkDiff/        # Network config diff and compliance
├── Openshift/          # OpenShift/OCP management
├── plex/               # Plex Media Server upgrade
├── roleonly_playbooks/ # Playbooks that call roles only
├── roles/              # Shared roles
├── SNOW/               # ServiceNow ITSM integration
├── Slack/              # Slack notifications
├── testplaybooks/      # Sandbox/test plays
└── Windows/            # Windows patching and feature management
```

---

## Platform Playbooks

### Azure

| Playbook | Description |
|---|---|
| `createresourcegroup.yml` | Create an Azure resource group |
| `createvirtualnet.yml` | Create a virtual network |
| `createsubnet.yml` | Add a subnet to a VNet |
| `createpublicip.yml` | Allocate a public IP address |
| `createvmsecgroup.yml` | Create a network security group |
| `createvnicwithpublic.yml` | Create a NIC with public IP attached |
| `createvnicnopublic.yml` | Create a NIC without public IP |
| `createvm.yml` | Deploy a VM from image |
| `createvnetpeering.yml` | Peer two Azure VNets |
| `startserver.yml` | Start a stopped Azure VM |
| `stopserver.yml` | Deallocate (stop) an Azure VM |
| `deleteVM.yml` | Delete a VM |
| `deleteresourcegroup.yml` | Delete a resource group and all resources |
| `getpubip.yml` | Get public IP of a VM |

### Network (IOS / NX-OS / ASA / EOS)

| Playbook | Description |
|---|---|
| `ios-backup.yml` | Back up IOS running configuration |
| `eos-backup.yml` | Back up EOS running configuration |
| `nxos-backup.yml` | Back up NX-OS running configuration |
| `asa-backup.yml` | Back up ASA configuration |
| `restoreconfig.yml` | Restore a configuration from backup file |
| `ios_facts.yml` | Gather and display IOS device facts |
| `ios_vlans.yml` | Manage VLANs on IOS devices |
| `ios_snmp.yml` | Configure SNMP on IOS devices |
| `ios_ntp.yml` | Configure NTP on IOS devices |
| `ios_setBanner.yml` | Set login/MOTD banner |
| `ios_configint.yml` | Configure interface settings |
| `ios_enabledisableint.yml` | Enable or disable an interface |
| `ios_changeintdesc.yml` | Update interface description |
| `ios-interface-validate.yml` | Validate interface state against expected |
| `upgradeios.yml` | Upgrade IOS software |
| `asa-changeacl.yml` | Modify ACL entries on ASA |
| `runcli.yml` | Run arbitrary CLI commands |

### Network Diff / Compliance

| Playbook | Description |
|---|---|
| `running_vs_startup.yml` | Diff running config vs startup config |
| `running_vs_intended.yml` | Diff running config vs intended (golden) config |
| `change_vs_running.yml` | Diff a proposed change against running config |
| `CreateHTMLinventory.yml` | Generate HTML inventory report |

### ServiceNow (SNOW)

| Playbook | Description |
|---|---|
| `trigger_SNOW_ticket.yaml` | Open a ServiceNow incident |
| `linux_httpd_patch_snow.yaml` | Patch httpd and create/update SNOW ticket |
| `linux_httpd_rollback_snow.yaml` | Roll back httpd patch and update SNOW ticket |
| `linux_httpd_rollback_snow_update_with_approval.yaml` | Rollback with SNOW approval gate |
| `remediate_expand_fs_snow.yaml` | Expand filesystem and update SNOW ticket |
| `batch_copy_snow.yaml` | Batch copy files, create SNOW ticket |
| `batch_copy_remediate_snow.yaml` | Batch copy + remediate with SNOW tracking |
| `getcurrentincidents.yml` | Query and display open incidents |
| `add_to_Tower_inventory.yaml` | Add a SNOW CMDB host to AAP inventory |
| `web_app_health.yaml` | Check web app health, open SNOW ticket on failure |

### Slack

| Playbook | Description |
|---|---|
| `slackalert.yml` | Send a custom Slack message (reusable, survey-driven) |
| `slackafailedtaskalert.yml` | Alert snippet for failed task notifications |

### Windows

| Playbook | Description |
|---|---|
| `update_windows.yml` | Apply Windows updates |
| `install_apps.yml` | Install applications via package manager |
| `cleanup_apps.yml` | Uninstall/cleanup applications |
| `install_windows_iss.yml` | Install IIS web server |
| `win_feature.yml` | Enable/disable Windows features |
| `validate_CVE-2020-1350.yml` | Validate CVE-2020-1350 (SIGRed) patch status |

### AAP Controller

| Playbook | Description |
|---|---|
| `exportcontroller.yml` | Export AAP Controller configuration |
| `createcustomcredtype.yml` | Create a custom credential type via API |
| `licenseupdate.yml` | Update AAP Controller license |
| `apigethostv3.yml` | Query Controller API v3 for host info |
| `apiquerylastjobrun.yml` | Get details of the last job run for a template |

### Dynatrace

| Playbook | Description |
|---|---|
| `installagent.yml` | Install Dynatrace OneAgent |
| `linuxclientinstall.yml` | Linux-specific OneAgent install |
| `uninstalllinux.yml` | Uninstall OneAgent from Linux |

---

## Collections Required

```yaml
# collections/requirements.yml
collections:
  - name: azure.azcollection
  - name: community.general
  - name: amazon.aws
  - name: ansible.posix
  - name: community.aws
  - name: servicenow.itsm
  - name: cisco.ios
  - name: cisco.nxos
  - name: cisco.asa
  - name: arista.eos
  - name: ansible.windows
```

---

## Variable Convention

Playbooks define blank variables that must be supplied via AAP Controller surveys or extra vars. Credentials injected by AAP Controller credential types are noted with comments.

```yaml
vars:
  target_host: ''         # passed via survey
  AWS_ACCESS_KEY_ID: ''   # passed from AAP Controller credential
  SN_HOST: ''             # passed from ServiceNow credential type
```
