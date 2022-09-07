# Ansible Automation Platform (AAP) Daily Demo
### AAP Daily Demo requirements  
    -   An Amazon Web Services account
    -   Your ssh public key must be installed in AWS management console.  The create_instance.yml is expecting a key named {{ vpc_name }}-ssh-key  
### AAP Daily Demo build up
**The AAP Daily Demo uses an AAP workflow**  
1. [The create_vpc.yml is the first playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/create_vpc.yml "create_vpc.yml")  
        ***Template variable examples***  
        ---  
        vpc_name: zigfreed  
        vpc_cidr: 172.16.1.0/24  
        region: us-west-2  
        user_name: hercules  
        alwaysup: false  
        deleteby: hercules
2. [The create_instance.yml is the second playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/create_instance.yml "create_instance.yml")  
        ***Template variable examples***  
        ---  
        vpc_name: zigfreed  
        user_name: hercules  
        subnet_name: "{{vpc_name}}_Subnet"  
        image: ami-0d6d43816a7c20dcf  
        count: 1  
        region: us-west-2  
        assign_public_ip: yes  
        alwaysup: false  
        instance_type: t2.micro    
3. [The aws_inventory_sync.yml is the third playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/aws_inventory_sync.yml "aws_inventory_sync.yml")  
        ***Template survey variable examples***  
        ---  
        username:    
        password:  
        tower_url:  
        inventory_id:  

        ****Special Note****
        The inventory used by this playbook must be a dynamic inventory  
4. [The redhat_subscription_manager.yml is the forth playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/redhat_subscription_manager.yml "redhat_subscription_manager.yml")  
        ***Template variable example***  
        ---  
        status: present  
5. [The aws_linux_postinstall.yml is the fifth playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/aws_linux_postinstall.yml "aws_linux_postinstall.yml")  
6. [The redhat_insights.yml is the sixth playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/redhat_insights.yml "redhat_insights.yml")  
        ***Template variable example***  
        ---  
        status: present  
7. [The aws_lamp_install.yml is the seventh playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/aws_lamp_install.yml "aws_lamp_install.yml")  
8. [The deploy_aap_demo_site.yml is the eighth playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/deploy_aap_demo_site.yml "deploy_aap_demo_site.yml")  
9. [The aws_get_instance_info.yml is the ninth playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/aws_get_instance_info.yml "aws_get_instance_info.yml")  
        ***Template variable example***  
        ---  
        region: us-west-2  
        mailfrom: hercules@example.com (Hercules Rocks)  
        mailto:  
        - Eric Ames <eric.ames@redhat.com>  
        bccto:  
        - Eric Ames <eames@redhat.com>  
        smtpserver: smtp.example.com  
        smtp_port:  587  
        ***Template survey variable examples***  
        ---  
        username:  
        password:  

        ****Special Note****
        You need the username and password for the mail exchanger you will use to send the email    
### AAP Daily Demo tear down is a workflow that is scheduled to run once a day
1. [The aws_inventory_sync.yml is the first playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/aws_inventory_sync.yml "aws_inventory_sync.yml")  
        ***Template survey variable examples***  
        ---  
        username:    
        password:  
        tower_url:  
        inventory_id:  

        ****Special Note****
        The inventory used by this playbook must be a dynamic inventory  
2.  [The redhat_insights.yml is the second playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/redhat_insights.yml "redhat_insights.yml")  
        ***Template variable example***  
        ---  
        status: absent  
3.  [The redhat_subscription_manager.yml is the third playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/redhat_subscription_manager.yml "redhat_subscription_manager.yml")  
        ***Template variable example***  
        ---  
        status: absent  
4.  [The delete_instance.yml is the fourth playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/delete_instance.yml "delete_instance.yml")  
        ***Template variable example***  
        ---  
        region: us-west-2  
        servername: Web Server  
        my_email_address: eames@redhat.com  
5. [The delete_vpc.yml is the fifth playbook in the workflow.](https://github.com/redawg/Ansiblewesttigers/blob/master/Demonstrations/AAP_daily_demo/delete_vpc.yml "delete_vpc.yml")  
        ***Template variable examples***  
        ---  
        vpc_name: zigfreed  
        vpc_cidr: 172.16.1.0/24  
        region: us-west-2  
        user_name: hercules  